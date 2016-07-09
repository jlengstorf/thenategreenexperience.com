import { getOffsetTop } from '../utils/offset';

let hasPeekerShown = false;

const getScrollTop = () => {
  return window.pageYOffset || document.documentElement.scrollTop;
};

const show = (peeker, peekerClass) => {
  peeker.classList.remove(`${peekerClass}--hidden`);
};

const hide = (peeker, peekerClass) => {
  peeker.classList.add(`${peekerClass}--hidden`);
};

const init = ({ peekerClass, elementClass }) => {
  const peeker = document.getElementsByClassName(peekerClass).item(0);

  // If the peeker isn’t on this page, do nothing.
  if (!peeker) {
    return;
  }

  // Get the peeker’s close link.
  const close = document.getElementsByClassName(`${peekerClass}__close-link`).item(0);

  // Get the article container and figure out where “mostly done reading” is.
  const article = document.getElementsByClassName(elementClass).item(0);
  const waypoint = getOffsetTop(article) + article.offsetHeight - window.innerHeight;

  // Add a listener to show the peeker when the reader hits the waypoint.
  document.addEventListener('scroll', event => {
    if (!hasPeekerShown && getScrollTop() >= waypoint) {
      show(peeker, peekerClass);
      hasPeekerShown = true;
    }
  });

  close.addEventListener('click', event => {
    event.preventDefault();

    hide(peeker, peekerClass);
  });
};

const peeker = {
  init,
};

export default peeker;
