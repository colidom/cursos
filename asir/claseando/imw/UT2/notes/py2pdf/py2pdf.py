#!/usr/bin/python3
import glob
import tempfile
import os
import sys

if not sys.argv[1:]:
    print("Modo de uso: {} <fichero.pdf>".format(sys.argv[0]))
    sys.exit()


bundle_filename = sys.argv[1]
if os.path.isfile(bundle_filename):
    print("""
        El fichero {} ya existe.
        Este fichero se usará como salida PDF y será sobreescrito!
        ¿Está seguro que quiere continuar? [S/N]
    """.format(bundle_filename))
    option = input()
    if option.upper() != "S":
        sys.exit()

tempfiles = []
for f in glob.iglob("*.py"):
    tf = "{}.ps".format(tempfile.mktemp())
    tempfiles.append(tf)
    os.system("vim {} \
               -c ':set nu' \
               -c 'set printoptions=number:y' \
               -c ':hardcopy > {}' \
               -c ':q'".format(f, tf))
tf = "{}.ps".format(tempfile.mktemp())
os.system("cat {} > {}".format(" ".join(tempfiles), tf))
os.system("ps2pdf {} {}".format(tf, bundle_filename))
