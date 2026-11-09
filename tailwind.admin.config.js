const base = require('./tailwind.config.js');
module.exports = { ...base, content: ['./app/Views/admin/**/*.php','./public/assets/js/admin/**/*.js','./app/Helpers/**/*.php','./app/Config/**/*.php'] };
