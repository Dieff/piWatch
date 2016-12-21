from src.main import *

executables = []
data = readModuleData()
for module in data:
    executables.append(data[module]['moduleScript'])
