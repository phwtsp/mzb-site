
import os

path = 'azure_static_site/sustentabilidade.html'

with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Identify the start and end of the script block
start_marker = '<script id="applicationScript">'
end_marker = 'window.application = new Application();\n</script>'

start_idx = content.find(start_marker)
end_idx = content.find(end_marker)

if start_idx != -1 and end_idx != -1:
    # Include the end marker length in removal
    end_idx += len(end_marker)
    
    new_content = content[:start_idx] + "<!-- Application Script Removed -->\n" + content[end_idx:]
    
    with open(path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Successfully removed application script.")
else:
    print("Script block not found.")
    # Debug: print snippet
    print(f"Start found: {start_idx}, End found: {end_idx}")
