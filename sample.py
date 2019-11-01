import csv
import sys

def escape(value):
    return value.replace('\\', '\\\\').replace('"', '\\"').replace('\n', '\\n').replace('\t', '\\t').replace('$', '\\$').replace('\r', '\\r')

reader = csv.reader(sys.stdin)
header = reader.next()
print("<?php")
print("$samplepubs = [")
for row in reader:
    data = zip(header, row)
    print("  [")
    for key, value in data:
        print('    "%s" => "%s",' % (key, escape(value)))
    print("  ],")
print("];");
print("?>");
