<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Http\Services\GroupService;
use App\Http\Services\RecaptchaService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function validateInviteLink(string $inviteCode)
    {
        $group = (new GroupService)->getDetails($inviteCode);

        if (!$group) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Link de convite inválido ou expirado'
            ], 500);
        }

        $groupExists = Group::where('invite_link', $inviteCode)->exists();

        if ($groupExists) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Este grupo já está sendo divulgado'
            ], 400);
        }

        return response()->json([
            'status' => 'success',
            'group'  => $group
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'invite_link'       => 'required',
            'name'              => 'required|string|min:3|max:100',
            'recaptchaResponse' => 'required',
            'description'       => 'nullable|string'
        ]);

        $isValidRecaptcha = (new RecaptchaService)->validate($request->recaptchaResponse);

        if (!$isValidRecaptcha) {
            return response()->json([
                'status'  => 'error',
                'message' => 'reCAPTCHA inválido'
            ], 500);
        }

        $group = (new GroupService)->getDetails($request->invite_link);

        if (!$group) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Link de convite inválido ou expirado'
            ], 500);
        }

        $image = (new GroupService)->saveImage($group['image']);

        if (!$image) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Erro ao salvar a imagem do grupo'
            ], 500);
        }

        $data['image'] = $image;
        $data['uri']   = (new GroupService)->generateUniqueSlugUri($request->name);

        $group = Group::create($data);

        return response()->json([
            'status'   => 'success',
            'group_id' => $group->id
        ], 201);
    }

}
