<?php

function buildPrefix($moduleName , $type){

    return config($moduleName.'.module-name').'/'.config($moduleName.'.prefix.'.$type,config('module.prefix.'.$type));
}
