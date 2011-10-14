import argparse

from array_injector import string_injector 

from string import Template

parser = argparse.ArgumentParser(description='Crea los elementos para crear una relacion')
parser.add_argument("-p", "--parent", dest='parent', required=True, help="Es el nombre de la tabla  del modulo que tiene muchos")
parser.add_argument("-pm", "--parent-module", dest='parent_module', help="Es el nombre del modulo que tiene muchos, por defecto el mismo nombre que la tabla")
parser.add_argument("-pd", "--parent-dict", dest='parent_dict', help="Es el nombre del diccionario del modulo que tiene muchos, por defecto el mismo nombre que el modulo")
parser.add_argument("-c", "--child", dest='child', required=True, help="Es el nombre de la tabla del  modulo que tiene uno")
parser.add_argument("-cm", "--child-module", dest='child_module', help="Es el nombre del  modulo que tiene uno, por defecto el mismo nombre que la tabla")
parser.add_argument("-cd", "--child-dict", dest='child_dict', help="Es el nombre del  modulo que tiene uno, por defecto el mismo nombre que el modulo")
args = parser.parse_args()

print args

if not args.parent_module:
    args.parent_module=args.parent

if not args.parent_dict:
    args.parent_dict = args.parent_module

if not args.child_module:
    args.child_module=args.child

if not args.child_dict:
    args.child_dict = args.child_module


template_string = open('rel_templates/relationship_template.php').read()
template = Template(template_string)
replaces = {}
replaces['parent'] = args.parent #nombre de la tabla
replaces['child'] = args.child #nombre de la tabla
replaces['parentmn'] = args.parent_module #parent module name
replaces['childmn'] = args.child_module #child module name
replaces['parentdn'] = args.parent_dict #parent dictionary name - see modules/parentmn/vardefs.php for dictionary name
replaces['childdn'] = args.child_dict  #child dictionary name see modules/childmn/vardefs.php for dictionary name
replaces['parentdl'] = replaces['parentdn'].lower() #parent dictionary name in lowercase
replaces['CHILD'] = replaces['child'].upper()
replaces['PARENTDL'] = replaces['parentdl'].upper()
#print template.substitute(replaces)

steps = {'parent':['subpanel', 'fields', 'relationships'], 'child':['fields', 'indices']}

vardefs = ['fields', 'relationships', 'indices']
layout = ['subpanel']

for entity in steps.keys():
   for step in steps[entity]:
        #abrir template
        if step in vardefs:
            file = "../modules/%s/vardefs.php" % getattr(args, entity+'_module')
        elif step in layout:
            file = "../modules/%s/metadata/subpaneldefs.php" % getattr(args, entity+"_module")
            #si el archivo esta vacio??
        else:
            continue

        template_string = open("rel_templates/%s_%s.php" % (entity, step)).read()
        template = Template(template_string)
        output = template.substitute(replaces)
        string_injector(file, step, output)







