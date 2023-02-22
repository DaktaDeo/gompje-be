const alwaysLightMode = false; //see laravel website repo

export const toDarkMode = () => {
    localStorage.theme = 'dark';
    window.updateTheme();
}

export const toLightMode = () => {
    localStorage.theme = 'light';
    window.updateTheme();
}

export const toSystemMode = () => {
    localStorage.theme = 'system';
    window.updateTheme();
}

export function updateTheme() {
    if (!('theme' in localStorage)) {
        localStorage.theme = 'system';
    }
    switch (localStorage.theme) {
        case 'system':
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            document.documentElement.setAttribute('color-theme', 'system');
            break;
        case 'dark':
            document.documentElement.classList.add('dark');
            document.documentElement.setAttribute('color-theme', 'dark');
            break;
        case 'light':
            document.documentElement.classList.remove('dark');
            document.documentElement.setAttribute('color-theme', 'light');
            break;
    }
    updateThemeAndSchemeColor();
}
export function updateThemeAndSchemeColor() {
    if (! alwaysLightMode) {
        if (document.documentElement.classList.contains('dark')) {
            document.querySelector('meta[name="color-scheme"]').setAttribute('content', 'dark');
            document.querySelector('meta[name="theme-color"]').setAttribute('content', '#171923');
            return;
        }
        document.querySelector('meta[name="color-scheme"]').setAttribute('content', 'light');
        document.querySelector('meta[name="theme-color"]').setAttribute('content', '#ffffff');
    }
}
