<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/lectures",
 *     summary="Получение списка лекций",
 *     tags={"Лекции"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer"),
 *              @OA\Property(property="topic", type="string"),
 *              @OA\Property(property="description", type="string"),
 *              ),
 *              example={
 *                  {
 *                      "id": 1,
 *                      "topic": "Введение в ООП",
 *                      "description": "В этой лекции вы познакомитесь с объектно ориентированным программированием на PHP. Вы узнаете о классах, интерфейсах, инкапсуляции и магических методах. В итоге поймете, для чего нужны классы как абстракция данных. Знание основ объектно ориентированного программирования пригодится, чтобы понимать плюсы и минусы кода с классами и объектами. Также это поможет использовать объекты для реализации программной логики. Этот курс подойдет тем, кто уже хорошо знаком с языком PHP. Чтобы учиться было проще, стоит заранее изучить курсы: «Основы PHP», «PHP: Массивы», «PHP: Ассоциативные массивы» и «PHP: Функции».",
 *                  },
 *                  {
 *                      "id": 2,
 *                      "topic": "Объектно-ориентированный дизайн",
 *                      "description": "В этой лекции вы познакомитесь с объектно ориентированным дизайном. Вы узнаете о паттернах, текучем интерфейсе и полезных популярных библиотеках. В итоге поймете, как правильно организовывать код, написанный на классах. Знания объектно ориентированного дизайна пригодятся, чтобы создавать и использовать цепочки функций, в том числе в неизменяемом стиле. Также они помогут правильно организовывать состояние объектов и проектировать безопасные сеттеры. Этот курс подойдет тем, кто уже хорошо знаком с языком PHP. Чтобы учиться было проще, стоит заранее изучить курсы: «Основы PHP», «PHP: Массивы», «PHP: Ассоциативные массивы» и «PHP: Функции».",
 *                  },
 *              }
 *         ),
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/lectures",
 *     summary="Создание лекции",
 *     tags={"Лекции"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      required={"topic"},
 *                      @OA\Property(property="topic", type="string", maxLength=255, example="Лекция о незабываемом"),
 *                      @OA\Property(property="description", type="string", example="Эту лекцию вы точно никогда не забудете"),
 *                 ),
 *             }
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Лекция успешно создана!"),
 *         ),
 *     ),
 *
 * ),
 *
 * @OA\Put(
 *     path="/api/lectures/{id}",
 *     summary="Обновить информацию о лекции",
 *     tags={"Лекции"},
 *     @OA\Parameter(
 *         description="id лекции",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=1,
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      required={"topic"},
 *                      @OA\Property(property="topic", type="string", maxLength=255, example="Лекция о незабываемом"),
 *                      @OA\Property(property="description", type="string", example="Эту лекцию вы точно никогда не забудете"),
 *                 ),
 *             }
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Лекция успешно обновлена!"),
 *         ),
 *     ),
 * ),
 *
 *
 * @OA\Delete(
 *     path="/api/lectures/{id}",
 *     summary="Удалить лекцию",
 *     tags={"Лекции"},
 *     @OA\Parameter(
 *         description="id лекции",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=1,
 *     ),
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Лекция успешно удалена!"),
 *         ),
 *     ),
 * ),
 */

class LectureController extends Controller
{

}
