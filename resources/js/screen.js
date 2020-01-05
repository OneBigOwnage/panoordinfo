import Flickity from 'flickity';

import 'flickity-imagesloaded';
import 'flickity-fullscreen';

import 'flickity/dist/flickity.min.css';

const IMAGES_URL        = '/screen/images'       ;
const AGENDA_ITEMS_URL  = '/screen/agenda-items' ;
const ANNOUNCEMENTS_URL = '/screen/announcements';

const initCarousel = () => {
    new Flickity('.carousel-container', {
        prevNextButtons: false,
        pageDots: true,
        wrapAround: true,
        pauseAutoPlayOnHover: false,
        autoPlay: true,
        imagesLoaded: true,
    });
};

const unloadCarousel = () => {
    const carouselInstance = getCarouselInstance();
    if (carouselInstance) {
        carouselInstance.destroy();
    }
};

const getCarouselInstance = () => Flickity.data('.carousel-container');


const updateAgendaItemsPanel = () => {
    fetch(AGENDA_ITEMS_URL).then(response => response.json()).then(items => {
        const agendaItemsPanel = document.querySelector('.panel-body.tinyAgendaPanel');
        agendaItemsPanel.innerHTML = null;

        items.forEach(item => {
            const template = document.createElement('template');
            template.innerHTML = item.html.trim();

            agendaItemsPanel.appendChild(template.content.firstChild);
        })
    });
};

const updateAnnouncementsPanel = () => {
    fetch(ANNOUNCEMENTS_URL).then(response => response.json()).then(items => {
        const announcementsPanel = document.querySelector('.panel-body.tinyAnnouncementPanel');
        announcementsPanel.innerHTML = null;

        items.forEach(item => {
            const template = document.createElement('template');
            template.innerHTML = item.html.trim();

            announcementsPanel.appendChild(template.content.firstChild);
        });
    });
};

const updateImagesCarousel = () => {
    fetch(IMAGES_URL)
        .then(response => response.json())
        .then(async items => {

            const instance = getCarouselInstance();

            if (!instance) {
                return items;
            }

            while (instance.selectedIndex) {
                // Simply wait until we are at the first picture,
                // as to minimize the visual impact of reloading the images from the server.
                await new Promise((resolve, reject) => setTimeout(() => resolve(), 1000));
            }

            return items;
        }).then(items => {
            const carouselContainer = document.querySelector('.carousel-container');

            unloadCarousel();

            carouselContainer.innerHTML = null;

            items.forEach(item => {
                const template = document.createElement('template');
                template.innerHTML = item.html.trim();

                carouselContainer.appendChild(template.content.firstChild);
            });


            initCarousel();
        });
};

const updateAll = () => {
    updateAgendaItemsPanel();
    updateAnnouncementsPanel();
    updateImagesCarousel();
}

setTimeout(updateAll, 5 * 60 * 1000);

updateAll();
