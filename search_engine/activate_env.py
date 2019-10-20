#!/usr/bin/python

activate_this = "/home/yayapipi/project/bin/activate_this.py"
execfile(activate_this, dict(__file__=activate_this))

from module import variable

print "Content-type:text/html\r\n\r\n"
print '<html>'
print '<head>'
print '<title>Virtualenv test</title>'
print '</head>'
print '<body>'
print '<h3>If you see this, the module import was successful</h3>'
print '</body>'
print '</html>'