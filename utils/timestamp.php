<?php

function timestamp() {
    return (new DateTime())->setTimezone(new DateTimeZone('America/Sao_Paulo'));
};
