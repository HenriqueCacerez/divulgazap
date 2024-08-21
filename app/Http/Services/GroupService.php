<?php

namespace App\Http\Services;

use App\Models\Group;
use Illuminate\Support\Str;

class GroupService
{
    public function saveImage(string $url, string $path = 'assets/images/groups/')
    {
        $directory = public_path($path);

        $image = file_get_contents($url);

        $fileName = uniqid()   . ".jpg";
        $filePath = $directory . $fileName;

        file_put_contents($filePath, $image);

        return $fileName;
    }

    public function getDetails(string $inviteCode)
    {
        $url = "https://chat.whatsapp.com/{$inviteCode}";

        $client = new \GuzzleHttp\Client();

        try {

            // Faz a requisição HTTP GET para a URL
            $response = $client->request('GET', $url);

            // Obtém o conteúdo da resposta
            $body = $response->getBody()->getContents();

            // Expressões regulares para encontrar o nome e a URL da imagem do grupo
            $patterns = [
                'name'  => '/<h3 class="_9vd5 _9scr" style="color:#5E5E5E;">(.*?)<\/h3>/s',
                'image' => '/<img class="_9vx6" src="(.*?)"/'
            ];

            // Inicializa os resultados como null
            $result = [
                'name'  => null,
                'image' => null
            ];

            // Procura o nome do grupo
            if (preg_match($patterns['name'], $body, $matches)) {
                $result['name'] = $matches[1];
            }

            // Procura a URL da imagem do grupo
            if (preg_match($patterns['image'], $body, $matches)) {
                // Substitui &amp; por &
                $result['image'] = html_entity_decode($matches[1]);
            }

            if ($result['name'] == "" || $result['image'] == "") {
                throw new \Exception();
            }

            return $result;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function generateUniqueSlugUri(string $groupName)
    {
        $slug         = Str::slug($groupName);
        $originalSlug = $slug;
        $count = 1;
    
        // Verifica se a 'uri' já existe no banco de dados
        while (Group::where('uri', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }
    
        return $slug;
    }
}
