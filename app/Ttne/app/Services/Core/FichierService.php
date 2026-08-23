<?php

namespace App\Services\Core;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class FichierService
{
    /**
     * =========================================================
     * CONFIGURATION
     * =========================================================
     */

    private const PHOTO_DISK = 'public';

    private const PHOTO_PATH = 'dependances/photos/users';

    private const DOCUMENT_DISK = 'public';

    private const DOCUMENT_PATH = 'dependances/documents/pieces';

    /**
     * Formats d'images acceptés pour les photos.
     */
    private const PHOTO_MIMES = [
        'image/jpeg',
        'image/png',
        'image/webp',
    ];

    /**
     * Formats acceptés pour les pièces d'identité.
     */
    private const DOCUMENT_MIMES = [
        'application/pdf',
        'image/jpeg',
        'image/png',
        'image/webp',
    ];

    /**
     * =========================================================
     * PHOTO UTILISATEUR
     * =========================================================
     */

    public static function stockerPhoto(
        UploadedFile $photo,
        ?string $ancienFichier = null,
        ?string $nom = null
    ): string {
        if (!in_array($photo->getMimeType(), self::PHOTO_MIMES, true)) {
            throw new Exception(
                'Le format de la photo n’est pas autorisé.'
            );
        }

        $manager = new ImageManager(new GdDriver());

        $image = $manager->read($photo->getPathname());

        /**
         * Normalisation de la photo :
         *
         * - cadrage carré
         * - 300 × 300 px
         * - JPEG
         * - qualité 80
         */
        $image = $image
            ->cover(300, 300)
            ->toJpeg(80);

        /**
         * Nom du fichier.
         *
         * Exemple :
         * jean_dupont_68a123456789.jpg
         */
        $baseName = $nom
            ? Str::slug($nom)
            : Str::slug(pathinfo(
                $photo->getClientOriginalName(),
                PATHINFO_FILENAME
            ));

        $filename = $baseName . '_' . Str::uuid() . '.jpg';

        $path = self::PHOTO_PATH . '/' . $filename;

        /**
         * Enregistrement de la nouvelle photo.
         */
        Storage::disk(self::PHOTO_DISK)->put(
            $path,
            (string) $image
        );

        /**
         * Suppression de l'ancienne photo uniquement
         * après que la nouvelle ait été correctement stockée.
         */
        if ($ancienFichier) {
            self::supprimer(
                $ancienFichier,
                self::PHOTO_DISK
            );
        }

        return $path;
    }

    /**
     * =========================================================
     * DOCUMENT
     * =========================================================
     */

    public static function stockerDocument(
        UploadedFile $document,
        ?string $ancienFichier = null,
        ?string $nom = null
    ): array {
        if (!in_array($document->getMimeType(), self::DOCUMENT_MIMES, true)) {
            throw new Exception(
                'Le format du document n’est pas autorisé.'
            );
        }

        /**
         * Nom de base du document.
         */
        $baseName = $nom
            ? Str::slug($nom)
            : Str::slug(pathinfo(
                $document->getClientOriginalName(),
                PATHINFO_FILENAME
            ));

        /**
         * On conserve l'extension correspondant
         * au fichier réellement stocké.
         */
        $extension = strtolower(
            $document->getClientOriginalExtension()
        );

        /**
         * Pour les extensions d'images, on normalise
         * les variantes courantes.
         */
        if ($document->getMimeType() === 'image/jpeg') {
            $extension = 'jpg';
        }

        $filename = $baseName . '_' . Str::uuid() . '.' . $extension;

        $path = self::DOCUMENT_PATH . '/' . $filename;

        /**
         * Stockage du document tel quel.
         */
        Storage::disk(self::DOCUMENT_DISK)->putFileAs(
            self::DOCUMENT_PATH,
            $document,
            $filename
        );

        /**
         * Suppression de l'ancien document uniquement
         * après stockage réussi.
         */
        if ($ancienFichier) {
            self::supprimer(
                $ancienFichier,
                self::DOCUMENT_DISK
            );
        }

        return [
            'path' => $path,
            'mime_type' => $document->getMimeType(),
        ];
    }

    /**
     * =========================================================
     * SUPPRESSION
     * =========================================================
     */

    public static function supprimer(
        ?string $fichier,
        string $disk = 'public'
    ): bool {
        if (!$fichier) {
            return false;
        }

        $storage = Storage::disk($disk);

        if (!$storage->exists($fichier)) {
            return false;
        }

        return $storage->delete($fichier);
    }

    /**
     * =========================================================
     * EXISTENCE
     * =========================================================
     */

    public static function existe(
        ?string $fichier,
        string $disk = 'public'
    ): bool {
        if (!$fichier) {
            return false;
        }

        return Storage::disk($disk)->exists($fichier);
    }
}
