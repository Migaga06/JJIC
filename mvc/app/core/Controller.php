<?php

class Controller
{
    public function view($name)
    {
        if(file_exists('../app/views/' . $name . '.php'))
<<<<<<< HEAD
        {
=======
         {
>>>>>>> 5c14c5bf4dc3b6c6e611cdeb37a61a1b813c8456
            require '../app/views/' . $name . '.php';
        }
        else
        {
<<<<<<< HEAD
            require '../app/views/404.php';
        }
    }
}
=======
        require '../app/views/404.php';
        }
    }
}
>>>>>>> 5c14c5bf4dc3b6c6e611cdeb37a61a1b813c8456
