import os
import argparse


def check_root():
    whoami = os.popen('whoami').read()
    if whoami.strip() != 'root':
        print('You need to be root to run this script')
        exit(1)


def delete_directory(username, domain):
    commands = [
        f"rm -rf /var/www/{username}/{domain}/",
    ]
    return [os.system(command) for command in commands]


def delete_apache(username, domain):
    commands = [
        f"rm /etc/apache2/sites-available/{domain}.conf",
        f"rm /etc/apache2/sites-enabled/{domain}.conf",
        f"systemctl restart apache2",
    ]
    return [os.system(command) for command in commands]


check_root()
parser = argparse.ArgumentParser(description='Delete a subdomain')
parser.add_argument('-u', '--username', help='Username', required=True)
parser.add_argument('-d', '--domain', help='Domain', required=True)
args = parser.parse_args()
delete_directory(args.username, args.domain)
delete_apache(args.username, args.domain)
print(f"Domain {args.domain} deleted successfully")