import { lazyLoadImages } from 'responsive-lazyload';
import { scrollToLocalLinks } from './utils/scroll-to-anchor';
import { highlightCurrentFootnote } from './blocks/footnotes';

lazyLoadImages();

document.addEventListener('click', event => {
  scrollToLocalLinks(event, {
    offsetAdjustment: 140,
    callback: highlightCurrentFootnote.bind(null, {
      containerClass: 'footnotes',
    }),
  });
});
