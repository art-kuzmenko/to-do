<?php

    function get_all_tasks() {
        return R::findAll('tasks');
    }