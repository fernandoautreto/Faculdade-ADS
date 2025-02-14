class TipoCliente:
    cod_cli = 0
    nome = ''
    fone = ''

class TipoDocumento:
    num_doc = 0
    cod_cli = 0
    dia_venc = 0
    dia_pag = 0
    valor = 0.0
    juros = 0.0

def menu():
    print('-'*50)
    print('Sistema de Gerenciamento de Documentos e Clientes')
    print('1 - Cadastrar clientes')
    print('2 - Relatório de clientes')
    print('3 - Cadastrar documentos')
    print('4 - Relatório de documentos')
    print('5 - Excluir cliente sem documento')
    print('6 - Excluir documento pelo número')
    print('7 - Excluir documentos por cliente')
    print('8 - Excluir documentos por período')
    print('9 - Alterar as informações dos clientes')
    print('10- Mostrar o total de documentos de determinado cliente')
    print('11 -Sair')
    print('-'*50)
    return int(input('Qual opção deseja? '))

def cadastro_cliente(vet_cliente):
    print()
    if len(vet_cliente) < 15:
        cadastro_cliente = TipoCliente()
        codigo = int(input('Cadastre o código do cliente: '))
        if verificar_cliente(codigo, vet_cliente):
            print('Código já cadastrado!!')
        else:
            cadastro_cliente.cod_cli = codigo
            cadastro_cliente.nome = input('Cadastre o nome do cliente: ')
            cadastro_cliente.fone = input('Cadastre o telefone do cliente: ')
            vet_cliente.append(cadastro_cliente)
        print()
    else:
        print('Limite de cadastro excedido!!')

    return vet_cliente

def verificar_cliente(codigo, vet_cliente):
    achei = False
    for cod in range(len(vet_cliente)):
        if codigo == vet_cliente[cod].cod_cli:
            achei = True
    if achei:
        return True
    else:
        return False

def visualizar_cliente(vet_cliente):
    print()
    for cliente in range(len(vet_cliente)):
        print('Código do cliente: ', vet_cliente[cliente].cod_cli, '\nNome do clinete: ', vet_cliente[cliente].nome,
              '\nTelefone do cliente: ', vet_cliente[cliente].fone)
        print()

def cadastro_doc(vet_doc, vet_cliente):
    print()
    if len(vet_doc) < 30:
            codigo_cliente = int(input('Cadastre o código do cliente: '))
            if verificar_cliente(codigo_cliente, vet_cliente):
                cadastro_doc = TipoDocumento()
                cadastro_doc.num_doc = int(input('Cadastre o número do  documento: '))
                cadastro_doc.cod_cli = codigo_cliente
                cadastro_doc.dia_venc = int(input('Cadastre o dia do vencimento: '))
                cadastro_doc.dia_pag = int(input('Cdastre o dia do pagamento: '))
                cadastro_doc.valor = float(input('Cadastre o valor do documento: R$ '))
                if cadastro_doc.dia_pag > cadastro_doc.dia_venc:
                    cadastro_doc.juros = cadastro_doc.valor * 0.05
                else:
                    cadastro_doc.juros = 0
                vet_doc.append(cadastro_doc)
            else:
                print('Código não cadastrado!!')
    else:
        print('Número de documentos máximo excedido!!')
    print()
    return vet_doc

def visualizar_doc(vet_doc):
    for doc in range(len(vet_doc)):
        print()
        print('Número do documento : ', vet_doc[doc].num_doc, '\nCódigo do cliente: ', vet_doc[doc].cod_cli,
            '\nDia do vencimento: ', vet_doc[doc].dia_venc, '\nDia do pagamento: ', vet_doc[doc].dia_pag,
            '\nJuros: R$ ',vet_doc[doc].juros)

#def exclu_cliente_semdoc(vet_cliente, vet_doc):
 #   print()
  #  if len(vet_cliente) > 0:
   #     indice = []
    #    for i in range(len(vet_cliente)):
     #       for j in range(len(vet_doc)):
      #          if vet_doc[j].cod_cli != vet_cliente[i].cod_cli:
       #             indice.append(i)
        #for i in range(len(indice)-1,-1,-1):
         #   vet_cliente.pop(indice[i])
          #  print('Cliente(s) excluido com sucesso!')
    #print()
    #return vet_cliente
def exclu_cliente_semdoc(vet_cliente, vet_doc):
    print()
    if len(vet_cliente) > 0:
        achei = []
        cont = 0
        for i in range(len(vet_cliente)):
            tem_documento = False
            for j in range(len(vet_doc)):
                if vet_cliente[i].cod_cli == vet_doc[j].cod_cli:
                    tem_documento = True
                    break
            if tem_documento:
                achei.append(vet_cliente[i])
                cont += 1
        if cont > 0:
            print('Cliente(s) excluido com sucesso!')
        else:
            print('Todos os clientes tem documento cadastrado')
    print()
    return achei

#def excluir_doc_pornumero(vet_doc):
 #   print()
  #  if len(vet_doc) > 0:
   #     excluir_doc = int(input('Informe o número do documento que deseja excluir: '))
    #    for i in range(len(vet_doc)):
     #       if vet_doc[i].num_doc == excluir_doc:
      #          indice = i
       # for doc in vet_doc:
        #    vet_doc.pop(indice)
         #   print('Documento excluído com sucesso!')
    #print()
    #return vet_doc

def excluir_doc_pornumero(vet_doc):
    print()
    achei = False
    if len(vet_doc) > 0:
        excluir_doc = int(input('Informe o número do documento que deseja excluir: '))
        for i in range(len(vet_doc)-1,-1,-1):
            if vet_doc[i].num_doc == excluir_doc:
                achei = True
                vet_doc.pop(i)
                print('Documento excluído com sucesso!')
        if not achei:
            print('Documento não encontrado!!')
    print()
    return vet_doc

def excluir_doc_por_cliente(vet_doc):
    print()
    achei = False
    if len(vet_doc) > 0:
        codigo_cliente = int(input('Informe o código do cliente: '))
        for y in range(len(vet_doc) -1, -1, -1):
            if codigo_cliente == vet_doc[y].cod_cli:
                achei = True
                vet_doc.pop(y) #ou del vet_doc[y]
                print('Documento excluído com sucesso!')
        if not achei:
            print('Cliente não encontrado!!')
    print()
    return vet_doc

#def excluir_doc_por_periodo(vet_doc):
 #   print()
  #  if len(vet_doc) > 0:
   #     indice = []
    #    dia_i = int(input('Informe o primeiro dia: '))
     #   dia_f = int(input('Informe o útimo dia:'))
      #  for i in range(len(vet_doc)):
       #     if dia_i <= vet_doc[i].dia_venc and vet_doc[i].dia_venc <= dia_f:
        #        indice.append(i)
        #for i in range(len(indice) -1, -1, -1):
         #   vet_doc.pop(indice[i])
        #print('Documento(s) excluídos com sucesso!')
        #print()
    #return vet_doc

def excluir_doc_por_periodo(vet_doc):
    print()
    if len(vet_doc) > 0:
        dia_i = int(input('Informe o primeiro dia: '))
        dia_f = int(input('Informe o útimo dia:'))
        for i in range(len(vet_doc)-1,-1,-1):
            if dia_i <= vet_doc[i].dia_venc and vet_doc[i].dia_venc <= dia_f:
                vet_doc.pop(i)
        print('Documento(s) excluídos com sucesso!')
        print()
    return vet_doc

def alterar_informa_cli(vet_cliente):
    print()
    achei = False
    if len(vet_cliente) > 0:
        codigo_cliente = int(input('Informe o código do cliente desejado: '))
        for i in range(len(vet_cliente)):
            if codigo_cliente == vet_cliente[i].cod_cli:
                achei = True
                cadastro_cliente = TipoCliente()
                vet_cliente[i].nome = input('Cadastre o nome do cliente: ')
                vet_cliente[i].fone = input('Cadastre o telefone do cliente: ')
                print('Dados alteraods com sucesso!')
                break
        if not achei:
            print('Cliente não encontrado!!')

        print()
    return vet_cliente

def mostrar_total_doc_cliente(vet_cliente, vet_doc):
    print()
    achei = False
    if len(vet_cliente) > 0:
        cod_cliente = int(input('Informe o código do cliente: '))
        for i in range(len(vet_cliente)):
            if cod_cliente == vet_cliente[i].cod_cli:
                achei = True
                contador = 0
                for j in range(len(vet_doc)):
                    contador += 1
                print(f'Total de docmundo cadastrado para o cliente {vet_cliente[i].nome}: {contador}')
                break
        if not achei:
            print('Cliente não encontrado!!')
    print()

def main():
    vet_cliente = []
    vet_doc = []
    achei = []
    while True:
        opcao = menu()
        if opcao == 11:
            print('Encerrando o programa....')
            break
        elif opcao == 1:
            vet_cliente = cadastro_cliente(vet_cliente)
        elif opcao == 2:
            visualizar_cliente(vet_cliente)
        elif opcao == 3:
            vet_doc = cadastro_doc(vet_doc,vet_cliente)
        elif opcao == 4:
            visualizar_doc(vet_doc)
        elif opcao == 5:
            vet_cliente = exclu_cliente_semdoc(vet_cliente, vet_doc)
        elif opcao == 6:
            vet_doc = excluir_doc_pornumero(vet_doc)
        elif opcao == 7:
            vet_doc = excluir_doc_por_cliente(vet_doc)
        elif opcao == 8:
            vet_doc = excluir_doc_por_periodo(vet_doc)
        elif opcao == 9:
            vet_cliente = alterar_informa_cli(vet_cliente)
        elif opcao == 10:
            mostrar_total_doc_cliente(vet_cliente, vet_doc)

main()