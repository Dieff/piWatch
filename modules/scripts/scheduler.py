from src.main import *
import sys

# TODO make this less shitty
dbt = sys.argv[1]
dbData = {
    'User': dbt.split(':')[0],
    'Password': dbt.split(':')[1].split('@')[0],
    'Host': dbt.split(':')[1].split('@')[1],
}

executables = []
data = readModuleData()
for module in data:
    executables.append(data[module]['moduleScript'])

print(dbData);
