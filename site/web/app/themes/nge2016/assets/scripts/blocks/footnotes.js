const resetFootnoteClasses = (containerClass, activeClass) => {
  const footnotes = document.querySelector(`.${containerClass}__list`);
  let footnote = footnotes ? footnotes.firstElementChild : false;

  // First, remove the active class from all highlights.
  while (footnote && footnote.tagName === 'LI') {
    footnote.classList.remove(activeClass);
    footnote = footnote.nextElementSibling;
  }
};

export function highlightCurrentFootnote({
  containerClass,
  highlightModifier = '--highlight',
}, target) {

  // For this to work, the container MUST be `position: relative|absolute`
  const container = target.parentNode;
  const isFootnote = container.classList.contains(`${containerClass}__list`);
  const activeClass = `${containerClass}__footnote${highlightModifier}`;

  // Unhighlight all the footnotes on every click.
  resetFootnoteClasses(containerClass, activeClass);

  // Next, check if this is a footnote and add the active class if so.
  if (isFootnote && target.tagName === 'LI') {
    target.classList.add(activeClass);
  }
}
