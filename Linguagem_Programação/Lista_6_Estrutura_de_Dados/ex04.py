class Aluno:
    nome = ''
    nasc = ''
    tel = 0
    endereco = ''
    serie = 0

def menu():
    print('-' * 50)
    print('Sistema para cadastro de aluno')
    print('1 - Cadastrar aluno')
    print('2 - Consulta pelo nome')
    print('3 - Visualizar todos os dados')
    print('4 - Sair')
    print('-' * 50)
    return int(input('Qual opção deseja? '))

def cadastrar(cadastro_aluno):
    print()
    for i in range(2):
        aluno = Aluno()
        aluno.nome = input('Cadastre o nome completo do aluno: ')
        aluno.nasc = input('Cadaste a data de nascimento do aluno (DD/MM/AAAA): ')
        aluno.tel = int(input('Cadastre o telefone do aluno: '))
        aluno.endereco = input('Cadestre o endereço do aluno: ')
        aluno.serie = int(input('Qual é a série atual do aluno: '))
        cadastro_aluno.append(aluno)
    return cadastro_aluno

def consulta(cadastro_aluno):
    print()
    aluno_consultado = input('Digite o nome do aluno para consultar: ')
    for i in range(len(cadastro_aluno)):
        if cadastro_aluno[i].nome == aluno_consultado:
            return cadastro_aluno[i]
    
def mostrar(aluno):
        print()
        print(f'Nome: {aluno.nome}\nNascimento: {aluno.nasc}\nTelefone: {aluno.tel}\nEndereço: {aluno.endereco}\nSérie: {aluno.serie}')

def main():
    cadastro_aluno = []
    while True:
        opcao = menu()
        if opcao == 4:
            print('Encerrando o programa....')
            break
        elif opcao == 1:
            cadastro_aluno = cadastrar(cadastro_aluno)
        elif opcao == 2:
            aluno = consulta(cadastro_aluno)
        elif opcao == 3:
            mostrar(aluno)

main()
