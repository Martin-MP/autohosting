import os
import argparse


def check_root():
    whoami = os.popen('whoami').read()
    if whoami.strip() != 'root':
        print('You need to be root to run this script')
        exit(1)


def create_user(username, password):
    commands = [
        f'useradd -g clients -s /bin/bash -m {username}',
    ]
    return [os.system(command) for command in commands]


def set_password(username, password):
    os.system(f'./changepass.sh -u {username} -p {password}')


def create_directory(username, domain):
    commands = [
        f"mkdir -p /var/www/{username}/{domain}/",
        f"chmod 755 /var/www/{username}/",
        f"chmod 755 /var/www/{username}/{domain}/",
        f"chown root:root /var/www/{username}",
        f"touch /var/www/{username}/{domain}/index.html",
        f"echo '<html><head><title>Welcome to {domain}!</title></head><body><h1>Success!  The {domain} virtual host is working!</h1></body></html>' > /var/www/{username}/{domain}/index.html",
        f"chown {username}:clients /var/www/{username}/{domain}",
        f"chown {username}:clients /var/www/{username}/{domain}/index.html",
        f"chmod 755 /var/www/{username}/{domain}/index.html"
    ]
    return [os.system(command) for command in commands]


def apache(username, domain):
    commands = [
        f"touch /etc/apache2/sites-available/{domain}.conf",
        "echo   '<VirtualHost *:80>\n" + \
                "ServerAdmin webmaster@localhost\n" + \
                f"ServerName {domain}.muguetabrothers.co.uk\n" + \
                f"ServerAlias www.{domain}.muguetabrothers.co.uk\n" + \
                f"Redirect / https://{domain}.muguetabrothers.co.uk/\n" + \
                "</VirtualHost>\n" + \
                "<VirtualHost *:443>\n" + \
                "ServerAdmin admin@localhost\n" + \
                f"ServerName {domain}.muguetabrothers.co.uk\n" + \
                f"ServerAlias www.{domain}.muguetabrothers.co.uk\n" + \
                f"DocumentRoot /var/www/{username}/{domain}/\n" + \
                "ErrorLog ${APACHE_LOG_DIR}/error.log\n" + \
                "CustomLog ${APACHE_LOG_DIR}/access.log combined\n" + \
                "SSLEngine on\n" + \
                "SSLCertificateFile /etc/apache2/certificate/apache2.cert\n" + \
                "SSLCertificateKeyFile /etc/apache2/certificate/apache2.key\n" + \
                f"</VirtualHost>' > /etc/apache2/sites-available/{domain}.conf",
        "systemctl restart ssh",
        f"a2ensite {domain}.conf",
        "a2enmod ssl",
        "systemctl reload apache2",
    ]
    return [os.system(command) for command in commands]


check_root()
parser = argparse.ArgumentParser(description='Create a new hosting')
parser.add_argument('-u', '--username', type=str, required=True, help='Username')
parser.add_argument('-d', '--domain', type=str, required=True, help='Domain')
parser.add_argument('-p', '--password', type=str, required=True, help='Password')
args = parser.parse_args()
create_user(args.username, args.password)
set_password(args.username, args.password)
create_directory(args.username, args.domain)
apache(args.username, args.domain)