<?php
/**
 * Everything on home page
 */
return function () {
    return site()
        ->index()
        ->listed()
        ->filterBy('template', 'in', ['post', 'journal', 'movie'])
        ->sortBy('date', 'desc');
};
