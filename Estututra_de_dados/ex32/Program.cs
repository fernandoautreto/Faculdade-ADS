/*
32) Implemente um programa com as seguintes opções: Sem tratamento de colisão, Tratamento de colisão Linear e Tratamento de colisão com Lista Encadeada.

Dentro de cada opção deve haver as funcionalidades: Inserir, Alterar e Relatar.

O vetor deve ser do tipo abstrato de dado composto por idade, nome e whats. Serão necessários 3 vetores, um para cada tipo de tratamento de colisão.

Para inserir um novo registro, solicite a idade, nome e whats. Utilize a idade como chave.

Para alterar solicite a idade (chave) para ser utilizada na busca. Caso encontrada, informe o nome e o whats da pessoa. Após a consulta, o usuário pode atualizar somente o nome e o whats.

Para relatar, percorra o vetor do inicio ao fim e exiba todos os registros.
*/


const int N = 3;
DadosPessoais[] vetSemTrat = new DadosPessoais[N];
DadosPessoais[] vetTratLin = new DadosPessoais[N];
DadosPessoais[] vetTratLE = new DadosPessoais[N];

int MenuPrincipal()
{
    Console.WriteLine("Cadastro de pessoas");
    Console.WriteLine("1 - Sem tratamento");
    Console.WriteLine("2 - Tratamento linear");
    Console.WriteLine("3 - Tratamento com lista encadeada");
    Console.WriteLine("4 - Sair");
    int op = Convert.ToInt32(Console.ReadLine());
    return op;
}

int MenuSec()
{
    Console.WriteLine("1 - Inserir");
    Console.WriteLine("2 - Alterar");
    Console.WriteLine("3 - Relatar");
    Console.WriteLine("4 - Sair");
    Console.Write("Qual opção deseja: ");
    int opcao = Convert.ToInt32(Console.ReadLine());
    return opcao;
}

void Inicializa(DadosPessoais[] v)
{
    for (int i=0; i<N; i++)
        v[i] = new DadosPessoais();
}
int Hash(int ch)
{
    return (ch % N);
}
void Inserir(int i, string name, string tel)
{
    int pos = Hash(i);
    vetSemTrat[pos].idade = i;
    vetSemTrat[pos].nome = name;
    vetSemTrat[pos].whats = tel;
}

void InsereTratLin(DadosPessoais[] v, int i, string n, string w)
{
    int pos = Hash(i);
    while (v[pos].idade != 0)
    {
        pos++;
        pos = pos % N;
    }
    v[pos].idade = i;
    v[pos].nome = n;
    v[pos].whats = w;
}
void InserirTratLE(int i,string n, string w)
{
    DadosPessoais no = new DadosPessoais();
    int posi = Hash(i);
    no.idade = i;
    no.nome = n;
    no.whats = w;
    if (vetTratLE[posi] != null)
    {
        no.prox = vetTratLE[posi];
    }
    vetTratLE[posi] = no;


}
int BuscaTratLin(DadosPessoais[] v, int i)
{
    int pos = Hash(i);
    int qtdT = 0;   // Qtd de tentativas
    while (v[pos].idade != i && qtdT < N)
    {
        pos++;
        pos = pos % N;
        qtdT++;
    }
    if (qtdT < N)
        return pos;    // Indica que encontrou na posição pos
    else
        return -1;   // Indica que não encontrou
}
DadosPessoais BuscarTratLE(int i)
{
    int posi = Hash(i); // Calcula a posição usando a função hash
    DadosPessoais atual = vetTratLE[posi]; // Ponteiro para o início da lista encadeada na posição

    // Percorre a lista encadeada para buscar o nó correspondente
    while (atual != null)
    {
        if (atual.idade == i) // Verifica se encontrou o elemento
        {
            return atual; // Retorna o nó encontrado
        }

        atual = atual.prox; // Avança para o próximo nó
    }

    return null; // Retorna null se o elemento não for encontrado
}

// Inicializa vetor sem tratamento de colisão e vetor com tratamento de colisão linear
Inicializa(vetSemTrat);
Inicializa(vetTratLin);
Console.Clear();

int idade = 0;
string whats = "", nome = "";
while (true)
{
    int op = MenuPrincipal();
    if (op > 3)
    {
        Console.WriteLine("Encerrando o programa....");
        break;
    }
    else if (op == 1)
    {
        int opcao = 0;
        while (opcao <= 3)
        {
            opcao = MenuSec();
            if (opcao == 1)
            {
                Console.Write("Digite uma idade: ");
                idade = Convert.ToInt32(Console.ReadLine());
                Console.Write("Digite o nome: ");
                nome = Console.ReadLine();
                Console.Write("Digite o número do Whatsapp: ");
                whats = Console.ReadLine();
                Inserir(idade, nome, whats);

            }
            else if (opcao == 2)
            {

                Console.Write("Digite a idade que deseja buscar: ");
                idade = Convert.ToInt32(Console.ReadLine());
                int posi = BuscaTratLin(vetSemTrat, idade);
                if (posi != -1)
                {
                    Console.WriteLine("Pessoa encontrada com sucesso");
                    Console.Write("Qual é o novo nome: ");
                    string nome_alterar = Console.ReadLine();
                    vetSemTrat[posi].nome = nome_alterar;
                    Console.WriteLine("Nome alterado com sucesso!");
                    Console.Write("Qual é o novo Whatsapp: ");
                    string num_cel = Console.ReadLine();
                    vetSemTrat[posi].nome = num_cel;
                    Console.WriteLine("Nome alterado com sucesso!");
                }
                else
                {
                    Console.WriteLine("Pessoa não encontrada.");
                }

            }
            else if (opcao == 3)
            {
                for (int i = 0; i < N; i++)
                {
                    int posi = Hash(i);  // Calcula a posição usando a função Hash
                    if (vetSemTrat[posi].idade != 0) // Verifica se há dados na posição
                    {
                        Console.WriteLine($"Posição: {posi}");
                        Console.WriteLine($"Idade: {vetSemTrat[posi].idade}");
                        Console.WriteLine($"Nome: {vetSemTrat[posi].nome}");
                        Console.WriteLine($"Whatsapp: {vetSemTrat[posi].whats}");
                        Console.WriteLine("---------------------------------------"); // Separador para melhorar a visualização
                    }
                }
            }

        }

    }
    else if (op == 2)
    {
        int opcao = 0;
        while (opcao <= 3)
        {
            opcao = MenuSec();
            if (opcao == 1)
            {
                Console.Write("Digite uma idade: ");
                idade = Convert.ToInt32(Console.ReadLine());
                Console.Write("Digite o nome: ");
                nome = Console.ReadLine();
                Console.Write("Digite o número do Whatsapp: ");
                whats = Console.ReadLine();
                InsereTratLin(vetSemTrat, idade, nome, whats);
            }
            else if (opcao == 2)
            {

                Console.Write("Digite a idade que deseja buscar: ");
                idade = Convert.ToInt32(Console.ReadLine());
                int posi = BuscaTratLin(vetSemTrat, idade);
                if (posi != -1)
                {
                    Console.WriteLine("Pessoa encontrada com sucesso");
                    Console.Write("Qual é o novo nome: ");
                    string nome_alterar = Console.ReadLine();
                    vetSemTrat[posi].nome = nome_alterar;
                    Console.WriteLine("Nome alterado com sucesso!");
                    Console.Write("Qual é o novo Whatsapp: ");
                    string num_cel = Console.ReadLine();
                    vetSemTrat[posi].nome = num_cel;
                    Console.WriteLine("Nome alterado com sucesso!");
                }
                else
                {
                    Console.WriteLine("Pessoa não encontrada.");
                }

            }
            else if (opcao == 3)
            {
                for (int i = 0; i < N; i++)
                {
                    int posi = Hash(i);  // Calcula a posição usando a função Hash
                    if (vetSemTrat[posi].idade != 0) // Verifica se há dados na posição
                    {
                        // Exibe os dados de forma mais organizada
                        Console.WriteLine($"Posição: {posi}");
                        Console.WriteLine($"Idade: {vetSemTrat[posi].idade}");
                        Console.WriteLine($"Nome: {vetSemTrat[posi].nome}");
                        Console.WriteLine($"Whatsapp: {vetSemTrat[posi].whats}");
                        Console.WriteLine("---------------------------------------"); // Separador para melhorar a visualização
                    }
                }
            }
        }
    }
    else
    {
        int opcao = 0;
        while (opcao <= 3)
        {
            opcao = MenuSec();
            if (opcao == 1)
            {
                Console.Write("Digite uma idade: ");
                idade = Convert.ToInt32(Console.ReadLine());
                Console.Write("Digite o nome: ");
                nome = Console.ReadLine();
                Console.Write("Digite o número do Whatsapp: ");
                whats = Console.ReadLine();
                InserirTratLE(idade, nome, whats);
            }
            else if (opcao == 2)
            {
                
                Console.Write("Digite a idade que deseja buscar: ");
                int idade_buscar = Convert.ToInt32(Console.ReadLine());
                DadosPessoais novo_no = BuscarTratLE(idade_buscar);

                if (novo_no != null) // Verifica se encontrou o elemento
                {
                    Console.WriteLine($"Pessoa encontrada: Nome: {novo_no.nome}, Whats: {novo_no.whats}");

                    // Solicita os novos dados
                    Console.Write("Digite o novo nome: ");
                    novo_no.nome = Console.ReadLine();
                    Console.Write("Digite o novo número do WhatsApp: ");
                    novo_no.whats = Console.ReadLine();

                    Console.WriteLine("Dados alterados com sucesso!");
                }
                else
                {
                    Console.WriteLine("Pessoa não encontrada.");
                }
            }
        
            else if (opcao == 3)
            {
                for (int i = 0; i < N; i++)
                {
                    DadosPessoais atual = vetTratLE[i];  // Começa a busca pela lista encadeada na posição i

                    if (atual != null) // Se a lista na posição não estiver vazia
                    {
                        Console.WriteLine($"Posição: {i}");  // Exibe a posição da lista
                        while (atual != null)  // Percorre a lista encadeada na posição
                        {
                            // Exibe os dados de todos os elementos na mesma lista encadeada
                            Console.WriteLine($"Idade: {atual.idade}, Nome: {atual.nome}, Whatsapp: {atual.whats}");
                            atual = atual.prox;  // Avança para o próximo nó da lista encadeada
                        }
                        Console.WriteLine("-----------------------------------------------");  // Separador para a próxima posição
                    }
                }
            }
        }
    }
}



class DadosPessoais
{
    public int idade;
    public string nome, whats;
    public DadosPessoais prox;
}