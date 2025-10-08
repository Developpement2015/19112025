// Appliquer les paramètres de thème enregistrés dans le stockage local
document.querySelector("html").setAttribute("data-layout-mode", localStorage.getItem('layoutMode') || 'light_mode');
document.querySelector("html").setAttribute('data-layout-style', localStorage.getItem('layoutStyle') || 'default');
document.querySelector("html").setAttribute('data-nav-color', localStorage.getItem('navColor') || 'light');

// Créer le panneau de paramètres de la barre latérale en utilisant jQuery
let themesettings = `
<div class="sidebar-settings nav-toggle" id="layoutDiv">
    <div class="sidebar-content sticky-sidebar-one">
        <div class="sidebar-header">
            <div class="sidebar-theme-title">
                <h5>Personnalisation du Thème</h5>
                <p>Personnalisez et prévisualisez en temps réel</p>
            </div>
            <div class="close-sidebar-icon d-flex">
                <a class="sidebar-refresh me-2" onclick="resetData()">&#10227;</a>
                <a class="sidebar-close" href="#">X</a>
            </div>
        </div>
        <div class="sidebar-body p-0">
            <div class="theme-mode mb-0">
                <div class="theme-body-main">
                    <div class="theme-head">
                        <h6>Mode du Thème</h6>
                        <p>Profitez des modes clair et sombre.</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 ">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="themes" id="lighttheme" class="check" value="light_mode" checked>
                                        <label for="lighttheme" class="checktoggles">
                                            <img src="/html/assets/img/theme/theme-img-01.jpg" alt="">
                                            <span class="theme-name">Mode Clair</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="layout-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="status-toggle d-flex align-items-center me-2">
                                        <input type="radio" name="themes" id="darktheme" class="check" value="dark_mode">
                                        <label for="darktheme" class="checktoggles">
                                            <img src="/html/assets/img/theme/theme-img-02.jpg" alt="">
                                            <span class="theme-name">Mode Sombre</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-preview-btn">
                            <a href="#" class="btn btn-secondary w-100" id="resetbutton">Réinitialiser</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
`

document.addEventListener("DOMContentLoaded", function() {
    // Ajouter les paramètres du thème au conteneur principal
    $(".main-wrapper").append(themesettings);

    const themeRadios = document.querySelectorAll('input[name="themes"]');
    const layoutRadios = document.querySelectorAll('input[name="layout"]');
    const colorRadios = document.querySelectorAll('input[name="nav_color"]');
    const resetButton = document.getElementById('resetbutton');

    function setThemeAndLayoutSettings(theme, layout, color) {
        document.documentElement.setAttribute('data-layout-mode', theme);
        document.documentElement.setAttribute('data-layout-style', layout);
        document.documentElement.setAttribute('data-nav-color', color);

        localStorage.setItem('layoutMode', theme);
        localStorage.setItem('layoutStyle', layout);
        localStorage.setItem('navColor', color);
    }

    function handleInputChange() {
        const theme = document.querySelector('input[name="themes"]:checked')?.value;
        const layout = document.querySelector('input[name="layout"]:checked')?.value;
        const color = document.querySelector('input[name="nav_color"]:checked')?.value;

        if (theme) {
            setThemeAndLayoutSettings(theme);
        } else {
            console.error("Un ou plusieurs paramètres sont introuvables :", {
                theme,
                layout,
                color
            });
        }
    }

    function resetThemeAndLayoutSettings() {
        setThemeAndLayoutSettings('light_mode', 'default', 'light');

        // Réinitialiser les boutons radio
        const lightThemeRadio = document.querySelector('input[name="themes"][value="light_mode"]');
        const defaultLayoutRadio = document.querySelector('input[name="layout"][value="default"]');
        const lightColorRadio = document.querySelector('input[name="nav_color"][value="light"]');

        if (lightThemeRadio) lightThemeRadio.checked = true;
        if (defaultLayoutRadio) defaultLayoutRadio.checked = true;
        if (lightColorRadio) lightColorRadio.checked = true;

        // Supprimer le paramètre de fond de la barre latérale si applicable
        localStorage.removeItem('sidebarBg');
    }

    // Initialiser les boutons radio en fonction des paramètres enregistrés
    const savedTheme = localStorage.getItem('layoutMode') || 'light_mode';
    const savedLayout = localStorage.getItem('layoutStyle') || 'default';
    const savedColor = localStorage.getItem('navColor') || 'light';

    const themeRadio = document.querySelector(`input[name="themes"][value="${savedTheme}"]`);
    const layoutRadio = document.querySelector(`input[name="layout"][value="${savedLayout}"]`);
    const colorRadio = document.querySelector(`input[name="nav_color"][value="${savedColor}"]`);

    if (themeRadio) themeRadio.checked = true;
    else console.error(`Le bouton radio pour le thème "${savedTheme}" est introuvable.`);

    if (layoutRadio) layoutRadio.checked = true;
    else console.error(`Le bouton radio pour la disposition "${savedLayout}" est introuvable.`);

    if (colorRadio) colorRadio.checked = true;
    else console.error(`Le bouton radio pour la couleur "${savedColor}" est introuvable.`);

    // Ajouter des gestionnaires d'événements
    themeRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    layoutRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    colorRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    if (resetButton) resetButton.addEventListener('click', resetThemeAndLayoutSettings);
});
