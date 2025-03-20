<?php
/**
 * Collections help with keeping your code DRY 
 */
return function () {
    return site()
        ->index()
        ->listed()
        ->filterBy('template', 'in', ['post','movie'])
        ->sortBy('date', 'desc');
};
