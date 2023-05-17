import subprocess
import argparse


def check_root():
    whoami = subprocess.run(['whoami'], stdout=subprocess.PIPE)
    if whoami.stdout.decode('utf-8').strip() != 'root':
        print('You need to be root to run this script')
        exit(1)

username = "test"
domain = "example.com"
command = f"echo '<html><head><title>Welcome to {domain}!</title></head><body><h1>Success!  The {domain} virtual host is working!</h1></body></html>' > /var/www/{username}/{domain}/index.html"
subprocess.run(command.split())