<?php

class View {

    function showView($viewToShow, $data = null)
    {

        /*
          if(is_array($data)) {

              // преобразуем элементы массива в переменные
              extract($data);
          }
          */

        /*
          динамически подключаем общий шаблон (вид),
          внутри которого будет встраиваться вид
          для отображения контента конкретной страницы.
          */

        include VIEWS_PATH . $viewToShow;
    }

}

?>