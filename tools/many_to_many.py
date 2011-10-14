import argparse
from string import Template


def append_file(line, file, comment=True):
    fh = open("../"+file, 'a')
    if comment:
        fh.write("/* "+line+" */")
    else:
        fh.write(line)
    fh.close()

    
parser = argparse.ArgumentParser(description='Crea los elementos para crear una relacion')
parser.add_argument("-l", "--left", dest='left', required=True, help="Nombre de la tabla del modulo izquierdo")
parser.add_argument("-lm", "--left-module", dest='left_module', help="Nombre del modulo izquierdo, por defecto el mismo nombre que la tabla")
parser.add_argument("-ld", "--left-dict", dest='left_dict', help="Nombre del diccionario del modulo izquierdo, por defecto el mismo nombre que el modulo")
parser.add_argument("-r", "--right", dest='right', required=True, help="Es el nombre de la tabla del  modulo derecho")
parser.add_argument("-rm", "--right-module", dest='right_module', help="Es el nombre del  modulo derecho, por defecto el mismo nombre que la tabla")
parser.add_argument("-rd", "--right-dict", dest='right_dict', help="Es el nombre del  modulo derecho, por defecto el mismo nombre que el modulo")
args = parser.parse_args()

if not args.left_module:
    args.left_module=args.left

if not args.left_dict:
    args.left_dict = args.left_module

if not args.right_module:
    args.right_module=args.right

if not args.right_dict:
    args.right_dict = args.right_module



replaces = {}
replaces['left'] = args.left #nombre de la tabla
replaces['right'] = args.right #nombre de la tabla
replaces['left_mn'] = args.left_module #left module name
replaces['right_mn'] = args.right_module #right module name
replaces['left_dn'] = args.left_dict #left dictionary name - see modules/leftmn/vardefs.php for dictionary name
replaces['right_dn'] = args.right_dict  #right dictionary name see modules/rightmn/vardefs.php for dictionary name
replaces['right_dl'] = replaces['right_dn'].lower() #right dictionary name in lowercase
replaces['left_dl'] = replaces['left_dn'].lower() #left dictionary name in lowercase
replaces['RIGHT'] = replaces['right'].upper()
replaces['LEFT'] = replaces['left'].upper()

# generar archivo metadata
template_metadata_string = open('rel_templates/metadata_template.php').read()
template = Template(template_metadata_string)
file_name = 'metadata/%s_%sMetaData.php' %(args.left, args.right)
append_file(template.substitute(replaces), file_name, comment=False)

line_append = "include('%s');" % file_name

append_file(line_append, 'modules/TableDictionary.php')
print "Se creo el archivo %s" % (file_name)
print """Se incluyo:

/*include('%s');*/

en el archivo modules/TableDictionary.php""" % (file_name)


#append a vardefs y subpanels
sides = ['left', 'right']

for side in sides:
    subpanel = 'rel_templates/%s_subpanel.php' % side
    vardefs =  'rel_templates/%s_vardefs.php' % side
    #subpanel
    
    temp_subpanel = open(subpanel).read()
    template = Template(temp_subpanel)
    file_name = 'modules/%s/metadata/subpaneldefs.php' % getattr(args, side+"_module")
    print "Agregando el subpanel al final de %s" % file_name
    append_file("Agregar en subpanel_setup", file_name)
    append_file(template.substitute(replaces), file_name)
    
    #vardefs
    temp_vardefs = open(vardefs).read()
    template = Template(temp_vardefs)
    file_name = 'modules/%s/vardefs.php' % getattr(args, side+"_module")
    print "Agregando el vardefs al final de %s" % file_name
    append_file("Agregar en subpanel_setup", file_name)
    append_file("Agregar en fields", file_name)
    append_file(template.substitute(replaces), file_name)




