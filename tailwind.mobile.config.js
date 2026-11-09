const base = require('./tailwind.config.js');
module.exports = { ...base, safelist: [], content: ['./app/Views/invitation/mobile/**/*.php','./public/assets/js/mobile/**/*.js'] };
