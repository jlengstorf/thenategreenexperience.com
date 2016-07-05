<?php

namespace NGE\Custom\Footnotes;

class Tracker {
  static $count = 0;
  static $footnotes = [];
}

function add_footnote( $content, $permalink ) {
  ++Tracker::$count;

  Tracker::$footnotes[Tracker::$count] = $content;

  return footnote_ref_link($permalink, Tracker::$count);
}

function footnote_ref_link( $permalink, $number ) {
  $pattern = '<sup class="footnote-ref">' .
             '<a href="%1$s#footnote-%2$s" id="note-%2$s" ' .
             'class="footnote-ref__link">%2$s</a></sup>';
  return sprintf($pattern, $permalink, $number);
}

function footnotes(  ) {
  $pattern = '<ol id="footnotes" class="footnotes__list">%s</ol>';
  $markup = [];

  if (Tracker::$count === 0) {
    return '';
  }

  foreach (Tracker::$footnotes as $number => $footnote) {
    $markup[] = footnote_markup($number, $footnote);
  }

  return sprintf($pattern, join('', $markup));
}

function footnote_markup( $number, $footnote ) {
  $pattern = '<li id="footnote-%1$s" class="footnotes__footnote"><p>' .
             '%2$s <a href="#note-%1$s" class="footnotes__return-link">↩</a>' .
             '</p></li>';

  return sprintf($pattern, $number, $footnote);
}
