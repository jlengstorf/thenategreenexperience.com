import { lazyLoadImages } from 'responsive-lazyload';
import { scrollToLocalLinks } from './utils/scroll-to-anchor';
import { highlightCurrentFootnote } from './blocks/footnotes';
import popover from './blocks/popover';

document.querySelector('.no-js').classList.remove('no-js');

lazyLoadImages();

popover.init();

document.addEventListener('click', event => {
  scrollToLocalLinks(event, {
    offsetAdjustment: 140,
    callback: highlightCurrentFootnote.bind(null, {
      containerClass: 'footnotes',
    }),
  });
});
