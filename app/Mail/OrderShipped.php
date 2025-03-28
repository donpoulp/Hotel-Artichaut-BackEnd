<?php

namespace  App\Mail ;

use  Illuminate\Bus\Queueable ;
use  Illuminate\Mail\Mailable ;
use  Illuminate\Mail\Mailables\Content ;
use  Illuminate\Mail\Mailables\Envelope ;
use  Illuminate\Queue\SerializesModels ;
use  Illuminate\Mail\Mailables\Address ;

class  OrderShipped  extends  Mailable
{
    use  Queueable , SerializesModels ;

    public  $data ;

    /**
     * Créer une nouvelle instance de message.
     */
    public  function  __construct ( $data )
    {
        $this ->data = $data ;
    }

    /**
     * Obtenir l'enveloppe du message.
     */
    public  function  envelope (): Envelope
    {
        return  new  Envelope (
            from: new  Address ( 'tristan.chadeuf@gmail.com' , 'Hotel Artichaut' ),
            subject: 'Hotel Artichaut Mail de confirmation',
        );
    }

    /**
     * Obtenir la définition du contenu du message.
     */
    public  function  content ( ): Content
    {
        return  new  Content (
            view: 'inscriptionMail' ,
        );
    }

    /**
     * Récupère les pièces jointes du message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public  function  attachments ( ): array
    {
        return [];
    }
}
