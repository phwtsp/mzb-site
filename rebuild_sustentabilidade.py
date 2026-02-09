
import os
import re

def read_file(path):
    with open(path, 'r', encoding='utf-8') as f:
        return f.read()

def write_file(path, content):
    with open(path, 'w', encoding='utf-8') as f:
        f.write(content)

export_path = 'Export_02_SobreNos/02_-_SUSTENTABILIDADE.html'
target_path = 'azure_static_site/sustentabilidade.html'
index_path = 'azure_static_site/index.html'
assets_dir = "assets/images/sustentabilidade/"

export_content = read_file(export_path)
index_content = read_file(index_path)

# Extract Header from index
header_match = re.search(r'(<header class="header">.*?</header>)', index_content, re.DOTALL)
header_html = header_match.group(1) if header_match else ""

# Update Navigation
# Update Navigation
new_nav_item = '<li><a href="sustentabilidade.html" class="active">SUSTENTABILIDADE</a></li>'
header_html = header_html.replace('class="active"', 'class="nav-item"')
header_html = re.sub(r'(<li><a href="sobre.html".*?</li>)', r'\1\n                    ' + new_nav_item, header_html)

# Extract Footer from index
footer_match = re.search(r'(<footer class="footer">.*?</footer>)', index_content, re.DOTALL)
footer_html = footer_match.group(1) if footer_match else ""

# Extract CSS from Export
style_start = export_content.find('<style id="applicationStylesheet"')
style_end = export_content.find('</style>', style_start) + 8
css_block = export_content[style_start:style_end]

# Retrieve Original Height for Main Container
height_match = re.search(r'#n_2_-_SUSTENTABILIDADE\s*{[^}]*height:\s*(\d+)px', css_block)
original_height = height_match.group(1) if height_match else "3024"
print(f"Detected original height: {original_height}px")

# Fix CSS URLs
def replace_css_url(match):
    full_str = match.group(0)
    inner = full_str[4:-1]
    quote = ""
    if inner.startswith(('"', "'")):
        quote = inner[0]
        url = inner[1:-1]
    else:
        url = inner
    if url.strip().startswith(('http', '/', 'data:', '#')):
        return full_str
    return f'url({quote}{assets_dir}{url}{quote})'

css_block = re.sub(r'url\((.*?)\)', replace_css_url, css_block)

# Extract Body Content
body_start_marker = '<div id="n_2_-_SUSTENTABILIDADE">'
body_start = export_content.find(body_start_marker)
body_end_marker = '</body>'
body_end = export_content.rfind(body_end_marker)

if body_start != -1 and body_end != -1:
    body_content = export_content[body_start:body_end]
else:
    body_content = "<!-- Content extraction failed -->"

# Remove onclick handlers
body_content = body_content.replace('onclick="application.goToTargetView(event)"', '')

# Fix Image Paths
def replace_paths(match):
    full_str = match.group(0)
    val = match.group(1)
    if not val: return full_str
    if val.startswith(('http', '/', '#')): return full_str
    return f'src="{assets_dir}{val}"'

body_content = re.sub(r'src="([^"]+)"', replace_paths, body_content)

def replace_srcset(match):
    val = match.group(1)
    parts = val.split(',')
    new_parts = []
    for part in parts:
        part = part.strip()
        if not part: continue
        subparts = part.split(' ')
        img_path = subparts[0]
        desc = subparts[1] if len(subparts) > 1 else ""
        if not (img_path.startswith(('http', '/', '#'))):
            img_path = f"{assets_dir}{img_path}"
        new_parts.append(f"{img_path} {desc}".strip())
    return f'srcset="{", ".join(new_parts)}"'

body_content = re.sub(r'srcset="([^"]+)"', replace_srcset, body_content)

# Custom CSS to Fix Layout, Remove Duplicates, and Center Text
custom_css = f"""
    <style>
        /* Base Override for Main Container */
        #n_2_-_SUSTENTABILIDADE {{
            position: relative !important;
            margin: 0 auto;
            top: 0 !important;
            height: auto !important; 
            overflow: visible !important;
            min-height: {original_height}px; /* Adjusted to match content height */
            width: 100%;
            max-width: 1920px;
            background: #fff;
        }}
        main {{
            display: block;
            background-color: #fff;
            padding-top: 100px; /* Space for fixed header */
        }}
        
        /* 
           REMOVE DUPLICATE MENUS AND FOOTERS
        */
        #adr, /* HOME */
        #adt, /* NOSSAS MARCAS */
        #adv, /* CONTATO */
        #ady, /* SOBRE NÓS */
        #aea, /* SERVIÇOS */
        #abz, /* Contact Button */
        #abr, /* Duplicate Footer Area */
        #adl  /* Duplicate Footer Area */
        {{
            display: none !important;
        }}

        /* Ensure Footer is separated */
        .footer {{
            position: relative;
            z-index: 10;
            margin-top: 0px;
        }}

        /* CENTERING TEXTS */
        
        /* 1. Sustentabilidade (Main Title) */
        #aaj {{
            left: 50% !important;
            transform: translateX(-50%) !important;
            text-align: center !important;
            width: auto !important;
            white-space: nowrap !important;
        }}

        /* 2. Práticas Sustentáveis */
        #abp {{
            left: 50% !important;
            transform: translateX(-50%) !important;
            text-align: center !important;
            width: auto !important;
        }}
        #abn {{
             /* Title container also needs to not clip if centered */
             overflow: visible !important;
        }}

        /* 3. Nossas certificações */
        /* This one is tricky as it is nested in #ace. 
           We will center #ace itself if it contains the title block mainly?
           #ace contains #acf (title) and #acg (description).
           Let's center the whole #ace block since it is the header of that section */
        #ace {{
            left: 50% !important;
            transform: translateX(-50%) !important;
            width: 100% !important; /* Allow internal centering */
            text-align: center !important;
        }}
        #acf {{
            /* Remove absolute positioning relative to #ace so it flows naturally center */
            position: relative !important;
            left: auto !important;
            top: auto !important;
            margin: 0 auto 20px auto !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
        }}
        #acg {{
            /* Description below certifications */
            position: relative !important;
            left: auto !important;
            top: auto !important;
            margin: 0 auto !important;
            text-align: center !important;
            display: block !important;
            max-width: 800px !important; /* Cap width for readability */
        }}

    </style>
"""

# HTML Template
html = f"""<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MZB Brasil - Sustentabilidade</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Figtree:wght@300;400;500;600;700;800;900&family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
    
    {css_block}
    
    {custom_css}
</head>
<body>

    {header_html}

    <main>
        {body_content}
    </main>

    {footer_html}

    <script src="assets/js/script.js"></script>
</body>
</html>
"""

write_file(target_path, html)
print("Rebuilt sustentabilidade.html: Maintained height, centered texts, fixed footer.")
