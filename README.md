# API на Laravel для университета

http://213.189.201.45:82/api <br>

Есть студенты, классы, лекции и учебный план. 
Студент может состоять только в одном классе.
В классе может быть много студентов.
У каждого класса есть учебный план, состоящий из разных лекций, в учебном плане лекции не могут повторяться.
Разные классы проходят лекции в разном порядке.

Примеры запросов ниже, ответ всегда приходит в формате JSON (либо данные, либо сообщение об ошибке).
Запросы лучше отправлять через Postman или любую другую программу для работы с API. 


------------------------------------------------------------------------------------------

### Студенты
##### Получить список студентов
<details>
 <summary><code>GET</code> <code><b>/students</b></code> </summary>

###### Параметров запроса нет
</details>

##### Получить информацию о конкретном студенте (имя, email, класс, прослушанные лекции)
<details>
 <summary><code>GET</code> <code><b>/students/{id}</b></code> </summary>

###### Параметров запроса нет
</details>

##### Создать студента
<details>
<summary><code>POST</code> <code><b>/students</b></code> </summary>

###### Параметры запроса
<table>
    <tr>
        <th style="vertical-align: top;">Ключ</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>name</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>максимум 255 символов</li>
                <li>цифры запрещены</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>email</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>формат e-mail</li>
                <li>не должно использоваться ранее</li>
            </ul>
        </td>
    </tr>
        <tr>
        <td>student_class_id</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>число</li>
                <li>класс с таким id должен существовать</li>
            </ul>
        </td>
    </tr>
</table>

</details>

##### Обновить студента (имя, принадлежность к классу)
<details>
<summary><code>PUT</code> <code><b>/students/{id}</b></code> </summary>

###### Параметры запроса
<table>
    <tr>
        <th style="vertical-align: top;">Ключ</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>name</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>максимум 255 символов</li>
                <li>цифры запрещены</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>student_class_id</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>число</li>
                <li>класс с таким id должен существовать</li>
            </ul>
        </td>
    </tr>
</table>
</details>

##### Удалить студента
<details>
 <summary><code>DELETE</code> <code><b>/students/{id}</b></code> </summary>

###### Параметров запроса нет
</details>

------------------------------------------------------------------------------------------

### Классы
##### Получить список классов
<details>
 <summary><code>GET</code> <code><b>/classes</b></code> </summary>

###### Параметров запроса нет
</details>

##### Получить информацию о конкретном классе (название, студенты класса)
<details>
 <summary><code>GET</code> <code><b>/classes/{id}</b></code> </summary>

###### Параметров запроса нет
</details>

##### Получить учебный план (список лекций) для конкретного класса
<details>
<summary><code>GET</code> <code><b>/classes/{id}/curriculum</b></code> </summary>

###### Параметров запроса нет
</details>

##### Создать класс
<details>
<summary><code>POST</code> <code><b>/classes</b></code> </summary>

###### Параметры запроса
<table>
    <tr>
        <th style="vertical-align: top;">Ключ</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>name</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>максимум 255 символов</li>
            </ul>
        </td>
    </tr>
</table>

</details>

##### Обновить класс (название)
<details>
<summary><code>PUT</code> <code><b>/classes/{id}</b></code> </summary>

###### Параметры запроса
<table>
    <tr>
        <th style="vertical-align: top;">Ключ</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>name</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>максимум 255 символов</li>
            </ul>
        </td>
    </tr>
</table>
</details>

##### Удалить класс
<details>
 <summary><code>DELETE</code> <code><b>/classes/{id}</b></code> </summary>

###### Параметров запроса нет
</details>

------------------------------------------------------------------------------------------

### Лекции

##### Получить список лекций
<details>
 <summary><code>GET</code> <code><b>/lectures</b></code> </summary>

###### Параметров запроса нет
</details>

##### Получить информацию о конкретной лекции (тема, описание, какие классы прослушали лекцию, какие студенты прослушали лекцию)
<details>
 <summary><code>GET</code> <code><b>/lectures/{id}</b></code> </summary>

###### Параметров запроса нет
</details>

##### Создать лекцию
<details>
<summary><code>POST</code> <code><b>/lectures</b></code> </summary>

###### Параметры запроса
<table>
    <tr>
        <th style="vertical-align: top;">Ключ</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>topic</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>максимум 255 символов</li>
            </ul>
        </td>
    </tr>
        <tr>
        <td>description</td>
        <td style="padding-left: 0">
            <ul>
                <li>не обязательное</li>
            </ul>
        </td>
    </tr>
</table>

</details>

##### Обновить лекцию (тема, описание)
<details>
<summary><code>PUT</code> <code><b>/lectures/{id}</b></code> </summary>

###### Параметры запроса
<table>
    <tr>
        <th style="vertical-align: top;">Ключ</th>
        <th>Значение</th>
    </tr>
    <tr>
        <td>topic</td>
        <td style="padding-left: 0">
            <ul>
                <li>обязательное</li>
                <li>максимум 255 символов</li>
            </ul>
        </td>
    </tr>
        <tr>
        <td>description</td>
        <td style="padding-left: 0">
            <ul>
                <li>не обязательное</li>
            </ul>
        </td>
    </tr>
</table>
</details>

##### Удалить лекцию
<details>
 <summary><code>DELETE</code> <code><b>/lectures/{id}</b></code> </summary>

###### Параметров запроса нет
</details>
