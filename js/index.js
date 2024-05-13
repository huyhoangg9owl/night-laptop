import Admin from './admin/index';
import Global from './global/index';
import Home from './pages/home';
function main() {
    const HTML = document.querySelector('html');
    if (HTML) {
        Global();
        RunInSite(null, Home);
        RunInSite('admin', Admin);
    }
}
function RunInSite(site, func) {
    if (site === null && window.location.pathname === '/') {
        func();
        return;
    }
    if (window.location.pathname.includes(site))
        func();
}
document.addEventListener('DOMContentLoaded', main);
