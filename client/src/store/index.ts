import {
  createStore,
  Store as VuexStore,
  CommitOptions,
  DispatchOptions,
  createLogger,
} from "vuex";

import { RootState, state } from "./state";
import { Getters, getters } from "./getters";
import { Mutations, mutations } from "./mutations";
import { Actions, actions } from "./actions";

import { authModule } from "./modules/auth/index";

const debug = process.env.NODE_ENV !== "production";

export const store = createStore({
  state,
  mutations,
  actions,
  getters,
  modules: {
    authModule,
  },
  strict: debug,
  plugins: debug ? [createLogger<RootState>()] : [],
});

export type Store = Omit<
  VuexStore<RootState>,
  "getters" | "commit" | "dispatch"
> & {
  commit<K extends keyof Mutations, P extends Parameters<Mutations[K]>[1]>(
    key: K,
    payload: P,
    options?: CommitOptions
  ): ReturnType<Mutations[K]>;
} & {
  dispatch<K extends keyof Actions>(
    key: K,
    payload: Parameters<Actions[K]>[1],
    options?: DispatchOptions
  ): ReturnType<Actions[K]>;
} & {
  getters: {
    [K in keyof Getters]: ReturnType<Getters[K]>;
  };
};
