import polyfill from 'babel-polyfill';
import { lazyLoadImages } from 'responsive-lazyload';
import { scrollToLocalLinks } from './utils/scroll-to-anchor';
import { highlightCurrentFootnote } from './blocks/footnotes';
import popover from './blocks/popover';
import peeker from './blocks/peeker';

document.querySelector('.no-js').classList.remove('no-js');

function initialize(  ) {

  // To keep the page snappy, we lazyload images.
  lazyLoadImages();

  popover.init();

  // The peeker is a little opt-in nag that shows up halfway through a post.
  peeker.init({
    peekerClass: 'peeker',
    elementClass: 'article__content',
  });

  // This keeps same-page anchor links from jumping. They scroll instead.
  document.addEventListener('click', event => {
    scrollToLocalLinks(event, {
      offsetAdjustment: 140,
      callback: highlightCurrentFootnote.bind(null, {
        containerClass: 'footnotes',
      }),
    });
  });
}

initialize();
