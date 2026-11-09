const base = require('./tailwind.config.js');
module.exports = { ...base, safelist: [], content: ['./app/Views/invitation/desktop/**/*.php','./public/assets/js/desktop/**/*.js'] };
