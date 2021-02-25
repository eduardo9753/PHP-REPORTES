<?php

class Paginacion
{
    private $iniciar;
    private $datos_x_paginas;
   

    public function __construct()
    {
        $this->iniciar = 0;
        $this->datos_x_paginas = "";
    }

    function setiniciar($iniciar)
    {
        $this->iniciar = $iniciar;
    }
    function getiniciar()
    {
        return $this->iniciar;
    }



    function setdatos_x_paginas($datos_x_paginas)
    {
        $this->datos_x_paginas = $datos_x_paginas;
    }
    function getdatos_x_paginas()
    {
        return $this->datos_x_paginas;
    }
}