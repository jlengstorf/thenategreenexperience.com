/**
 * Get the distance from the top of the page for a given element.
 * @param  {Element} element the element to retrieve the offset for
 * @return {Number}          the offset
 */
export const getOffsetTop = element => {
  let offsetTop = 0;

  do {
    if (!isNaN(element.offsetTop)) {
      offsetTop += element.offsetTop;
    }
  } while (element = element.offsetParent);

  return offsetTop;
};
