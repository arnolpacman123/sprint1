<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Encuesta
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $descripcion
 * @property bool $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Seccion[] $secciones
 * @property-read int|null $secciones_count
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encuesta whereUpdatedAt($value)
 */
	class Encuesta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Opcion
 *
 * @property int $id
 * @property int $numero
 * @property string $valor
 * @property int $pregunta_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pregunta $pregunta
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion wherePreguntaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opcion whereValor($value)
 */
	class Opcion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pregunta
 *
 * @property int $id
 * @property string $enunciado
 * @property string $tipo
 * @property bool $estado
 * @property int $seccion_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Opcion[] $opciones
 * @property-read int|null $opciones_count
 * @property-read \App\Models\Seccion $seccion
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereEnunciado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereSeccionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereUpdatedAt($value)
 */
	class Pregunta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seccion
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $descripcion
 * @property int $encuesta_id
 * @property bool $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Encuesta $encuesta
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pregunta[] $preguntas
 * @property-read int|null $preguntas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereEncuestaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereUpdatedAt($value)
 */
	class Seccion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

