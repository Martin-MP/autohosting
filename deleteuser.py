import os
import argparse
import mysql.connector


class Database:
    def __init__(self, host, user, password, database):
        self.db = mysql.connector.connect(
            host=host,
            user=user,
            password=password,
            database=database
        )
        self.cursor = self.db.cursor()
        self.domains = list()

    def get_sub_domains(username):
        query = f"SELECT domain FROM subdomains WHERE username='{username}'"
        cursor.execute(query)
        self.domains = cursor.fetchall()


def check_root():
    whoami = os.popen('whoami').read()
    if whoami.strip() != 'root':
        print('You need to be root to run this script')
        exit(1)


check_root()
parser = argparse.ArgumentParser(description='Delete a user and all their subdomains')
parser.add_argument('-u', '--username', help='Username', required=True)
args = parser.parse_args()
autohosting_db = Database(
    host="localhost",
    user="php",
    password="alumnat",
    database="autohosting_db"
)
autohosting_db.get_sub_domains(args.username)
for domain in autohosting_db.domains:
    print(domain)