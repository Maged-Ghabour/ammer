import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace date and time inputs
content = content.replace('<input type="text" class="form-control" placeholder="اختار يوم">', '<input type="date" class="form-control" placeholder="اختار يوم">')
content = content.replace('<input type="text" class="form-control" placeholder="اختار الوقت">', '<input type="time" class="form-control" placeholder="اختار الوقت">')

# Replace SVGs in cards
for i in range(1, 7):
    # Regex to match card i
    # We find the start of the card <!-- Card X -->
    pattern = r'(<!-- Card ' + str(i) + r' -->\s*<div class="service-card">\s*)<div class="card-bg-icon">.*?</div>(\s*)<div class="card-icon">.*?</div>'
    replacement = r'\1<div class="card-bg-icon">\n                    <img src="assets/bg' + str(i) + r'.png" alt="">\n                </div>\2<div class="card-icon">\n                    <img src="assets/icon' + str(i) + r'.png" alt="">\n                </div>'
    
    # Actually, matching across newlines with .*?
    content = re.sub(pattern, replacement, content, flags=re.DOTALL)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print('Done')
