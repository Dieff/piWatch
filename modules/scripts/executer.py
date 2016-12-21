"""
When this script is run from the command line it will try to run any filenames
it gets as arguments. Used by scheduler.py to make sure modules run in order
"""
import sys
import os

for fileName in sys.argv:
    if(not(fileName == os.path.basename(__file__))):
        print(fileName)
        os.system('python2 ' + fileName);
