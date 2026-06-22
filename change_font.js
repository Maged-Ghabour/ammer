const fs = require('fs');
const path = require('path');

const themeDir = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme';

const filesToUpdate = [
    'functions.php',
    'style.css',
    'assets/css/admin-style.css',
    'assets/css/login-style.css'
];

const tajawalURL = 'family=Tajawal:wght@400;500;700;800&display=swap';
const alexandriaURL = 'family=Alexandria:wght@300;400;500;600;700;800;900&display=swap';

filesToUpdate.forEach(file => {
    const filePath = path.join(themeDir, file);
    if (fs.existsSync(filePath)) {
        let content = fs.readFileSync(filePath, 'utf-8');
        
        // Replace URL
        content = content.replace(new RegExp(tajawalURL.replace(/[.*+?^${}()|[\\]\\\\]/g, '\\\\$&'), 'g'), alexandriaURL);
        
        // Replace font family name
        content = content.replace(/'Tajawal'/g, "'Alexandria'");
        content = content.replace(/Tajawal/g, "Alexandria");
        
        fs.writeFileSync(filePath, content, 'utf-8');
        console.log("Updated " + file);
    } else {
        console.log("File not found: " + file);
    }
});
