<!doctype html>
<html lang="en">
  <head>
    <title>Paises</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAPFBMVEX81wAAN4fLBhSkjAH/3ADPBhSEBAz/3wAAIY0AOYvSAAABIleHBAx0YgOojwGrkQD/5AAAEluJAABdBAgl0lkcAAABhklEQVR4nO3Q2VVCURRAsatMIo+5/15lWcHZ/0kJWdfbjpHbdd1Oe0ZOt7XbL0b2O1ljsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICj5Z98eJkcd9PX8Yeq7L+YuR80XWmKxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQF/1kMXdbrl6HXOh6+GTkcZY3JCmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgaxAViArkBXICmQFsgJZgazgk7UdGNrWezsysr3/AKA11CmMDT1rAAAAAElFTkSuQmCC">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
        }
    </style>
  </head>
  <body>
      <header class="text-center text-light shadow">
          <h1>Paises de la región</h1>
      </header>
      <main class="text-dark">
        <table class="m-auto table table-stiped w-50 mt-5">
            <thead class="bg-primary text-light">
                <tr>
                    <th>Pais</th>
                    <th>Capital</th>
                    <th>Moneda</th>
                    <th>Población</th>
                    <th>Nombre de ciudades</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach($paises as $pais=>$infoPais)
                    <tr>
                        <td>{{$pais}}</td>
                        <td>{{$infoPais["capital"]}}</td>
                        <td>{{$infoPais["moneda"]}}</td>
                        <td>{{$infoPais["poblacion"]}}</td>
                        <td>
                        @foreach ($infoPais["ciudades"] as $clave => $infoCiudades)
                        <p>{{$infoCiudades}}</p>
                         @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
      </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>