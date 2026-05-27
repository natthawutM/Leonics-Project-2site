const fs = require('fs');
const acorn = require('acorn');

const code = fs.readFileSync('/Applications/XAMPP/xamppfiles/htdocs/BELB_Sabah/Terusan_MYS/f1/plant.html', 'utf8');

// Find script tag
const match = code.match(/<script>(.*?)<\/script>/s);
if (match) {
  try {
    acorn.parse(match[1], { ecmaVersion: 2020 });
    console.log("Syntax OK");
  } catch(e) {
    console.log("Syntax error at line", e.loc.line, "col", e.loc.column);
    const lines = match[1].split('\n');
    console.log("Line:", lines[e.loc.line - 1]);
    console.log(e.message);
  }
} else {
  console.log("No script tag found");
}
