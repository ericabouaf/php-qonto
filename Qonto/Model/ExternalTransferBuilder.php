<?php

namespace neyric\Qonto\Model;

/**
 * Class ExternalTransferBuilder
 * @package neyric\Qonto\Model
 * @author MeilleursBiens
 */
class ExternalTransferBuilder
{

    /**
     * UUID of the beneficiary
     *
     * @var string UUID of the beneficiary
     */
    protected $beneficiary_id;

    /**
     * IBAN of account to debit
     *
     * @var string UUID of the beneficiary
     */
    protected $debit_iban;

    /**
     * Reference for the external transfer
     * (Max: 99 characters)
     *
     * @var string
     */
    protected $reference;

    /**
     * Note for the external transfer
     *
     * @var string
     */
    protected $note;

    /**
     * Currency of the external transfer (ISO 4217)
     *
     * @var string (ex: EUR)
     */
    protected $currency = "EUR";

    /**
     * Scheduled date for the external transfer
     * (Format : YYYY-MM-DD)
     *
     * @var string
     */
    protected $scheduled_date;

    /**
     * Amount for the external transfer (max: 30000)
     * @url https://www.w3.org/TR/payment-request/#dfn-valid-decimal-monetary-value
     *
     * @var string
     */
    protected $amount;

    /**
     * @return ExternalTransferBuilder
     */
    public static function create(): ExternalTransferBuilder
    {
        return new ExternalTransferBuilder();
    }

    /**
     * @param string $beneficaryId
     * @return ExternalTransferBuilder
     */
    public function beneficaryId(string $beneficaryId): ExternalTransferBuilder
    {
        $this->beneficiary_id = $beneficaryId;
        return $this;
    }

    /**
     * @param string $debitIban
     * @return ExternalTransferBuilder
     */
    public function debitIban(string $debitIban): ExternalTransferBuilder
    {
        $this->debit_iban = $debitIban;
        return $this;
    }

    /**
     * @param string $reference
     * @return ExternalTransferBuilder
     * @throws \Exception The reference must be lower or equal than 99 characters !
     */
    public function reference(string $reference): ExternalTransferBuilder
    {
        if(strlen($reference) > 99) throw new \Exception("The reference must be lower or equal than 99 characters !");

        $this->reference = $reference;
        return $this;
    }

    /**
     * @param string $note
     * @return ExternalTransferBuilder
     */
    public function note(string $note): ExternalTransferBuilder
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @param string $currency
     * @return ExternalTransferBuilder
     */
    public function currency(string $currency = "EUR"): ExternalTransferBuilder
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @param string $scheduled_date YYYY-MM-DD
     * @return ExternalTransferBuilder
     * @throws \Exception Scheduled date must be in YYYY-MM-DD format !
     */
    public function scheduledDate(string $scheduled_date): ExternalTransferBuilder
    {
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $scheduled_date)) throw new \Exception("Scheduled date must be in YYYY-MM-DD format !");

        $this->scheduled_date = $date;

        return $this;
    }

    /**
     * @param float $amount
     * @return ExternalTransferBuilder
     * @throws \Exception Amount must be upper than 0 !
     * @throws \Exception Amount must be lower or equal than 30000 !
     */
    public function amount(float $amount): ExternalTransferBuilder
    {
        if($amount <= 0) throw new \Exception("Amount must be upper than 0 !");
        if($amount > 30000) throw new \Exception("Amount must be lower or equal than 30000 !");

        $this->amount = $amount;

        return $this;
    }

    // -----------------------------

    public function build(): array
    {
        return [
            "external_transfer" => [
                "beneficiary_id" => $this->beneficiary_id,
                "debit_iban" => $this->debit_iban,
                "reference" => $this->reference,
                "note" => $this->note,
                "currency" => $this->currency,
                "scheduled_date" => $this->scheduled_date,
                "amount" => $this->amount,
            ]
        ];
    }

}