def string_injector(file, tag, payload):
    source = open(file).read()
    start_idx = source.find(tag)
    counter = 0
    first_match = False
    for letter in source[start_idx:]:
        print letter
        print first_match
        if letter == '(':
            counter += 1
            first_match=True
        elif letter == ')':
            counter -= 1
        
        if first_match and counter == 0:
            break
        start_idx += 1
    fh = open(file, 'w')
    output = source[:start_idx] + payload + source[start_idx:]
    fh.write(output)
    fh.close()
