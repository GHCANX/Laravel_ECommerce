namespace App\Services\Crypto;

class PgpService
{
    protected \Crypt_GPG $gpg;

    public function __construct()
    {
        $this->gpg = new \Crypt_GPG([
            'homedir' => storage_path('pgp'),
        ]);
    }

    public function importPublicKey(string $key): string
    {
        $import = $this->gpg->importKey($key);

        if (!$import || empty($import['fingerprint'])) {
            throw new \RuntimeException('Invalid PGP key');
        }

        return $import['fingerprint'];
    }

    public function encrypt(string $fingerprint, string $plaintext): string
    {
        $this->gpg->addEncryptKey($fingerprint);
        return $this->gpg->encrypt($plaintext);
    }
}
