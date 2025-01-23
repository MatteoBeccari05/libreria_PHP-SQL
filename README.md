**Progetto: Applicazione per la gestione di una libreria**

---

### **Requisiti Funzionali**
Definiscono le azioni che l'applicazione deve essere in grado di eseguire:

1. **CRUD sui libri**:
   - **Create**: L'operatore deve poter inserire un nuovo libro nel sistema.
   - **Read**: L'operatore deve poter leggere e visualizzare tutti i libri presenti nella libreria.
   - **Update**: L'operatore deve poter aggiornare il prezzo di un libro già presente nel sistema.
   - **Delete**: L'operatore deve poter rimuovere un libro dal sistema, identificandolo tramite il titolo e l'autore.

2. **Interfaccia menu**:
   - Il menu principale deve presentare quattro pulsanti, uno per ogni operazione (Create, Read, Update, Delete).
   - Ogni pagina dell'applicazione deve essere dedicata a una singola operazione (inserimento, visualizzazione, aggiornamento, rimozione) e contenere i quattro pulsanti.

3. **Dati di un libro**:
   Ogni libro deve essere caratterizzato dai seguenti dati:
   - Titolo
   - Autore
   - Genere
   - Prezzo
   - Anno di pubblicazione

---

### **Requisiti Utente**
Definiscono le aspettative dell'utente finale rispetto all'interazione con l'applicazione:

1. **Homepage**:
   - L'applicazione deve presentare una homepage che includa immagini a piacere, dando un aspetto visivamente gradevole e invitante.

2. **Inserimento dati**:
   - Per inserire un nuovo libro, l'utente deve disporre di un form dove poter immettere i dati richiesti (titolo, autore, genere, prezzo, anno di pubblicazione).

3. **Messaggi di conferma**:
   - Dopo ogni inserimento o aggiornamento, l'utente deve ricevere un messaggio di conferma che attesti l'avvenuta operazione.

4. **Visualizzazione dei dati**:
   - I libri letti (leggi) devono essere mostrati in una tabella ordinata, che permetta una rapida visualizzazione delle informazioni.

---

### **Requisiti di Sistema**
Definiscono le specifiche tecniche per l'implementazione dell'applicazione:

1. **Organizzazione dei file**:
   - Ogni funzionalità dell'applicazione (Create, Read, Update, Delete) deve essere implementata in un file separato.
   - Il codice HTML non deve essere duplicato, ma riutilizzabile attraverso l'inclusione di file comuni.

2. **Connessione al database**:
   - La connessione al DBMS MySQL deve essere centralizzata in un unico file, per una gestione centralizzata delle operazioni di connessione.

3. **Cybersecurity**:
   - Le specifiche per la cybersecurity saranno definite in una fase successiva dello sviluppo.

---
